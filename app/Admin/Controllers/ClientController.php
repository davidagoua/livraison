<?php

namespace App\Admin\Controllers;

use App\Models\Client;
use App\Models\Commune;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ClientController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Client';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Client());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Date de creation'));
        $grid->column('nom', __('Nom'));
        $grid->column('contact', __('Contact'));
        $grid->column('commune.nom','Commune');

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
        $show = new Show(Client::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('nom', __('Nom'));
        $show->field('contact', __('Contact'));
        $show->field('commune_id', __('Commune id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Client());

        $form->text('nom', __('Nom'));
        $form->mobile('contact', __('Contact'))->options(['mask'=>'99 999 999']);
        $form->select('commune_id', __('Commune'))->options(Commune::all()->pluck('nom','id'));

        return $form;
    }
}
