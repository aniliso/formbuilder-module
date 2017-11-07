<?php

namespace Modules\Formbuilder\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterFormbuilderSidebar extends AbstractAdminSidebar
{

    /**
     * Method used to define your sidebar menu groups and items
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {

            $group->item(trans('formbuilder::formbuilder.title.form builder'), function (Item $item) {
                $item->weight(0);
                $item->icon('fa fa-list-alt');
                $item->authorize(
                    $this->auth->hasAccess('user.users.index') or $this->auth->hasAccess('user.roles.index')
                );

                $item->item(trans('formbuilder::formbuilder.title.forms'), function (Item $item) {
                    $item->weight(0);
                    $item->icon('fa fa-list-alt');
                    $item->route('admin.formbuilder.formbuilder.index');
                    $item->authorize(
                        $this->auth->hasAccess('formbuilder.formbuilder.index')
                    );
                });

                $item->item(trans('formbuilder::formbuilder.title.submissions'), function (Item $item) {
                    $item->weight(1);
                    $item->icon('fa fa-envelope-o');
                    $item->route('admin.formbuilder.submissions.index');
                    $item->authorize(
                        $this->auth->hasAccess('formbuilder.submission.index')
                    );
                });
            });
        });

        return $menu;
    }
}