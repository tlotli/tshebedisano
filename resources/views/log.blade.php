@extends('layouts.app')

@section('main-styles')
    <link href="{{asset('css/jquery.datatables.css')}}" rel="stylesheet">
@endsection

@section('main-section')
    <div class="panel panel-default">

        <div class="panel-body">
            <br />
            <div class="table-responsive">
                <table class="table table-striped" id="table2">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Log Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $l)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                {{$l->log}}
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




