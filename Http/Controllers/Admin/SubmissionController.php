<?php

namespace Modules\Formbuilder\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Formbuilder\Entities\Forms;
use Modules\Formbuilder\Entities\FormSubmitData;

class SubmissionController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->assetPipeline->requireJs('x-editable.js');
        $this->assetPipeline->requireCss('x-editable.css');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $forms = Forms::all();

        return view('formbuilder::admin.submissions.index', compact('forms'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function form($id)
    {
        $form = Forms::findOrFail($id);
        $formSubmissions = $form->formSubmits()->paginate(12);

        return view('formbuilder::admin.submissions.form', compact('form', 'formSubmissions'));
    }

    public function excel($id)
    {
        $form = Forms::findOrFail($id);
        \Excel::create($form->getFormContent($this->locale)->name, function($excel) use ($form){
            $excel->sheet('Sheet 1', function($sheet) use ($form) {
                $formFields = $form->getFields();
                $formSubmissions = $form->formSubmits;
                $datas = collect();
                $fields = collect($formFields)->pluck('name')->toArray();
                $datas->push($fields);
                foreach ($formSubmissions as $submission):
                    $data = $submission->formSubmitData();
                    foreach ($formFields as $field):
                        $data = $submission->formSubmitData();
                        $fieldData[$field['name']] = $data->firstOrNew(['field_name' => $field['name'], 'submit_id' => $submission->id]);
                    endforeach;
                    $datas->push(collect($fieldData)->pluck('field_value')->toArray());
                endforeach;
                $sheet->rows($datas);
            });
        })->export('xls');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Paused $paused
     *
     * @return Response
     */
    public function destroy($id)
    {
        Forms::findOrFail($id)->delete();
        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('formbuilder::formbuilder.title.form')]));

        return redirect()->route('admin.formbuilder.formbuilder.index');
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        if($request->ajax()) {
            if ($request->get('pk')) {
                $field = FormSubmitData::where('submit_id', $request->get('pk'))
                                ->where('field_name', $request->get('name'));
                if($field->update(['field_value'=>$request->get('value')])) {
                    return response()->json([
                        'success' => true
                    ], Response::HTTP_ACCEPTED);
                } else {
                    $field->create([
                        'submit_id' => $request->get('pk'),
                        'field_name' => $request->get('name'),
                        'field_value' => $request->get('value'),
                        'field_order' => 0
                    ]);
                    return response()->json([
                        'success' => true
                    ], Response::HTTP_ACCEPTED);
                }
            }
        }
    }
}
