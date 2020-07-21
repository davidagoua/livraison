<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\Livraison;
use App\Models\Recepteur;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $communeAnalys = Recepteur::all()->pluck('commune_id');
        dd($communeAnalys);
        return $content
            ->title('Dashboard')
            ->row(function(Row $row){
                $row->column(8, function (Column $column){
                   $column->append(view('admin.charts.commune',[
                       'communes' => Commune::all()->pluck('nom')
                   ]));
                });
            });
    }
}
