@extends('layouts.app')

@section('main-styles')
    <link href="{{asset('css/jquery.datatables.css')}}" rel="stylesheet">
@endsection

@section('main-section')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{route('roles.create')}}" class="btn btn-primary">Add Role <i class="fa fa-plus"></i></a>
        </div>
        <div class="panel-body">
            <br />
            <div class="table-responsive">
                <table class="table table-striped" id="table2">
                    <thead>
                    <tr>
                        <th>Permission Name</th>
                        <th>Created By</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $r)
                        <tr>
                            <td>{{$r->name}}</td>
                            <td>
                                {{$r->firstname . ' ' . $r->lastname}}
                            </td>
                            <td>{{$r->created_at}}</td>
                            <td>
                                <a href="{{route('roles.edit' , ['id' => $r->id])}}" class="btn btn-xs btn-success">Edit</a>


                                <form id="delete-role-{{$r->id}}" method="post" action="{{route('roles.destroy' , ['id' => $r->id])}}" style="display: none">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>


                                <a href="" class="btn btn-xs btn-danger"
                                   onclick="if(confirm('Are you sure you want to delete role ?')) {
                                           event.preventDefault(); document.getElementById('delete-role-{{$r->id}}').submit();
                                           }
                                           else{event.preventDefault();
                                           }">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-responsive -->
        </div><!-- panel-body -->
    </div>
@endsection

@section('custom-scripts')
    <script src="{{asset('js/jquery.datatables.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            "use strict";
            jQuery('#table1').dataTable();
            jQuery('#table2').dataTable({
                "sPaginationType": "full_numbers"
            });
            // Select2
            jQuery('select').select2({
                minimumResultsForSearch: -1
            });
            jQuery('select').removeClass('form-control');
            // Delete row in a table
            jQuery('.delete-row').click(function(){
                var c = confirm("Continue delete?");
                if(c)
                    jQuery(this).closest('tr').fadeOut(function(){
                        jQuery(this).remove();
                    });
                return false;
            });
            // Show aciton upon row hover
            jQuery('.table-hidaction tbody tr').hover(function(){
                jQuery(this).find('.table-action-hide a').animate({opacity: 1});
            },function(){
                jQuery(this).find('.table-action-hide a').animate({opacity: 0});
            });
        });
    </script>
@endsection




