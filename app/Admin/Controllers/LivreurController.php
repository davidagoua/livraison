<?php

namespace App\Admin\Controllers;

use App\Models\Livreur;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LivreurController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Livreur';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Livreur());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('user_id', __('User id'));
        $grid->column('nom', __('Nom'));
        $grid->column('contact', __('Contact'));
        $grid->column('dispo', __('Dispo'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Livreur::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('user_id', __('User id'));
        $show->field('nom', __('Nom'));
        $show->field('contact', __('Contact'));
        $show->field('dispo', __('Dispo'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Livreur());

        $form->number('user_id', __('User id'));
        $form->text('nom', __('Nom'));
        $form->mobile('contact', __('Contact'))->options(['mask'=>'99 999 999']);
        $form->switch('dispo', __('Dispo'))->default(1);

        return $form;
    }
}
