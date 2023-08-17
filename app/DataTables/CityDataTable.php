<?php

namespace App\DataTables;

use App\Models\{City,State,Country};
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;


class CityDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action',function ($row) {
                return $this->checkrights($row);
            })
            ->editColumn('country', function($row){
                //  dd($row);
                 if(isset($row->country[0]))
                 {
                     return  $row->country[0]['name'];
                 }
                 else{
 
                     return 'its not have Country';
                 }
             })
            ->editColumn('state', function($row){
                // dd($state);
                 if(isset($row->state[0]))
                 {
                     return  $row->state[0]['name'];
                 }
                 else{
 
                     return 'its not have state';
                 }
             })
            ->editColumn('status',function ($row) {
                if($row['status']==1){
                   return  '<input type="checkbox" checked onclick="changeStatus(event.target, '.$row->id.');">';  
                }
                else{
                   return  '<input type="checkbox" unchecked onclick="changeStatus(event.target, '.$row->id.');">'; 
                }
            })
            ->rawColumns(['action', 'status']);
    }

    public function checkrights($row)
    {
        $menu = '';
        $editurl = '';
        $deleteurl = '';
        // $historyurl = route('attributes.history', [$row->id]);

        
            $menu .= '<div class="dropdown no-arrow">
            <a class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="' . route('city.edit', $row->id) .'"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <style>
    .rotate-right {
	animation: rotate-right 1s cubic-bezier(1, -0.01, 0.13, 1.15) infinite alternate-reverse both;
   transform-origin: top center;
}
@keyframes rotate-right {
  0% {
    transform: rotate(0);
   }
   25%{
      transform: rotate(10deg); 
   }
   50{
      transform: rotate(0deg); 
   }
  100% {
    transform: rotate(-10deg); 
  }
}
  </style>
  <g class="rotate-right">
  <path stroke="#265BFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.5 7.307h5"/>
  <path stroke="#0A0A30" stroke-width="1.5" d="M9 5.5A1.5 1.5 0 0110.5 4h3A1.5 1.5 0 0115 5.5v11.3a1.5 1.5 0 01-.54 1.152l-1.5 1.249a1.5 1.5 0 01-1.92 0l-1.5-1.249A1.5 1.5 0 019 16.8V5.5z"/>
  </g>
</svg>
 Edit</a>
              
                <form action=" '. route('city.destroy', $row->id) .' ")" method="POST">
                '.csrf_field().'
                '.method_field("DELETE").'
                <button type="submit" class="dropdown-item" > <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><style>@keyframes rotate-tr{0%{transform:rotate(0)}to{transform:rotate(20deg)}}</style><path fill="#0A0A30" d="M16.773 10.083a.75.75 0 00-1.49-.166l1.49.166zm-1.535 7.027l.745.083-.745-.083zm-6.198 0l-.745.083.745-.083zm-.045-7.193a.75.75 0 00-1.49.166l1.49-.166zm5.249 7.333h-4.21v1.5h4.21v-1.5zm1.038-7.333l-.79 7.11 1.491.166.79-7.11-1.49-.166zm-5.497 7.11l-.79-7.11-1.49.166.79 7.11 1.49-.165zm.249.223a.25.25 0 01-.249-.222l-1.49.165a1.75 1.75 0 001.739 1.557v-1.5zm4.21 1.5c.892 0 1.64-.67 1.74-1.557l-1.492-.165a.25.25 0 01-.248.222v1.5z"/><path fill="#265BFF" fill-rule="evenodd" d="M11 6a1 1 0 00-1 1v.25H7a.75.75 0 000 1.5h10a.75.75 0 000-1.5h-3V7a1 1 0 00-1-1h-2z" clip-rule="evenodd" style="animation:rotate-tr 1s cubic-bezier(1,-.28,.01,1.13) infinite alternate-reverse both;transform-origin:right center"/></svg>Delete</button>
                </form>
                
            </div>
        </div>';
        
        return $menu;
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\City $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(City $model)
    {
        $model = City::select()->with(['country','state']);
        if (request()->get('name', false)) {
            $model->where('name', 'like', "%" . request()->get("name") . "%");
        }
        if (request()->get('country', false)) {
            $model->where('country_id',request()->get("country"));
        }  
        if (request()->get('state', false)) {
            $model->where('state_id',request()->get("state"));
        }  
        return $this->applyScopes($model->newQuery());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('city-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'City_' . date('YmdHis');
    }
}
