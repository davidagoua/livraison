<?php

namespace App\Admin\Controllers;

use App\Models\Recepteur;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RecepteurController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Recepteur';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Recepteur());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('nom', __('Nom'));
        $grid->column('contact', __('Contact'));
        $grid->column('commune_id', __('Commune id'));
        $grid->column('livraison_id', __('Livraison id'));

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
        $show = new Show(Recepteur::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('nom', __('Nom'));
        $show->field('contact', __('Contact'));
        $show->field('commune_id', __('Commune id'));
        $show->field('livraison_id', __('Livraison id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Recepteur());

        $form->text('nom', __('Nom'));
        $form->text('contact', __('Contact'));
        $form->number('commune_id', __('Commune id'));
        $form->number('livraison_id', __('Livraison id'));

        return $form;
    }
}
