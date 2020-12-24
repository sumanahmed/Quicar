@extends('quicar.backend.layout.admin')
@section('title','Partner Message')
@section('content')
    <div class="content-body">
        <div class="container-fluid pd-x-0">
            <div class="row row-xs">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mt-2 tx-spacing--1 float-left">Partner Messages</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="messageTable">
                                <thead class="thead-dark">
                                <tr>                                  
                                    <th>Partner Name</th>                                           
                                    <th>Partner Mobile</th>                                           
                                    <th>Message</th>                                 
                                    <th>Status</th>                                    
                                    <th style="vertical-align: middle;text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="allFeedback">
                                @if(isset($messages) && count($messages) > 0)
                                    @foreach($messages as $message)
                                        <tr class="message-{{ $message->id }}">
                                            <td>{{ $message->owner_name }}</td>                                          
                                            <td>{{ $message->owner_phone }}</td>                                          
                                            <td>{{ $message->message }}</td>                                           
                                            @if($message->status == 1)
                                                <td>Read</td>
                                            @else 
                                                <td>Unread</td>
                                            @endif                               
                                            <td style="vertical-align: middle;text-align: center;">
                                                @if($message->status == 0)
                                                    <a href="{{ route('backend.message.partner_message.update', $message->id) }}" class="btn btn-raised btn-warning btn-sm" title="Read"><i class="fas fa-check"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No Data Found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection
@section('scripts')
<script src="{{ asset('quicar/backend/js/feedback.js')}}"></script>
    <script>
        $("#partner_message").addClass('active');
        $('#messageTable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    </script>    
@endsection
