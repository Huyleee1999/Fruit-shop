@extends('dashboard.index')
@section('navitem')
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Fruit</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('fruit.index') }}">List Fruit</a>
                <a class="collapse-item" href="{{ route('fruit.show') }}">Add Fruit</a>
                {{-- <a class="collapse-item" href="cards.html">Cards</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Calendar</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                <a class="collapse-item" href="{{ route('calendar.index') }}">Show Calendar</a>
                {{-- <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a> --}}
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Category</span>
        </a>
        <div id="category" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('category.index') }}">List Category</a>
                <a class="collapse-item" href="{{ route('category.show') }}">Show Category</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="{{ route('list-users') }}">Lists User</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('chat.show') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Chat</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection
@section('main')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="shadow-none position-relative overflow-hidden mb-2">
                <div class="d-sm-flex d-block justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-uppercase"> Notes</h5>
                    <nav aria-label="breadcrumb" class="d-flex align-items-center">
                        <ol class="breadcrumb d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a class="text-note-home text-decoration-none" href="../main/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item text-note" aria-current="page">
                                Notes
                            </li>
                        </ol>

                    </nav>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist"> 
            <li class="nav-item">
                <a class="nav-note-active btn nav-link gap-6 note-link d-flex align-items-center justify-content-center active px-3 px-md-3"
                    id="pills-home-tab" data-note-link="all-notes" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                    <i class="ti ti-list fill-white"></i>
                    <span class="d-none d-md-block fw-medium">All Notes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-note-active btn nav-link gap-6 note-link d-flex align-items-center justify-content-center px-3 px-md-3" 
                    id="note-business-tab" data-note-link="business" data-toggle="pill" href="#note-business" role="tab" aria-controls="note-business" aria-selected="true">
                    <i class="ti ti-briefcase fill-white"></i> 
                    <span class="d-none d-md-block fw-medium">Business</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn gap-6 note-link d-flex align-items-center justify-content-center px-3 px-md-3 nav-note-active"
                    id="note-social-tab" data-note-link="social" data-toggle="pill" href="#note-social" role="tab" aria-controls="note-social" aria-selected="true">
                    <i class="ti ti-share fill-white"></i>
                    <span class="d-none d-md-block fw-medium">Social</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn gap-6 note-link d-flex align-items-center justify-content-center px-3 px-md-3 nav-note-active"
                    id="note-important" data-note-link="important" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                    <i class="ti ti-star fill-white"></i>
                    <span class="d-none d-md-block fw-medium">Important</span>
                </a>
            </li>
            <li class="nav-item ms-auto">
                <a href="javascript:void(0)" class="btn btn-primary d-flex align-items-center px-3 gap-6" id="add-notes">
                    <i class="ti ti-file fs-4"></i>
                    <span class="d-none d-md-block fw-medium fs-3">Add Notes</span>
                </a>
            </li>
        </ul>

        {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">123</div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">abc</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
          </div> --}}
        <div class="tab-content">
            <div class="tab-pane active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="note-has-grid row">
                    @foreach ($all_notes as $item)
                        <div class="col-md-4 single-note-item">
                            <div class="card card-body">
                                <span class="side-stick"></span>
                            
                                <h6 class="note-title text-truncate w-75 mb-0" data-noteHeading="Book a Ticket for Movie">{{ $item->title }}</h6>
                                <p class="note-date fs-2">{{ $item->note_date }}</p>
                                <div class="note-content">
                                    <p class="note-inner-content" data-noteContent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">{{ $item->description }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)" class="link me-1">
                                        <i class="ti ti-star fs-4 favourite-note"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="link text-danger ms-2">
                                        <i class="ti ti-trash fs-4 remove-note"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>  
            </div>

            <div class="tab-pane" id="note-business" role="tabpanel" aria-labelledby="note-business-tab">
                <div class="note-has-grid row">
                    @foreach ($note_business as $item)
                        <div class="col-md-4 single-note-item">
                            <div class="card card-body">
                                <span class="side-stick"></span>
                            
                                <h6 class="note-title text-truncate w-75 mb-0" data-noteHeading="Book a Ticket for Movie">{{ $item->title }}</h6>
                                <p class="note-date fs-2">{{ $item->note_date }}</p>
                                <div class="note-content">
                                    <p class="note-inner-content" data-noteContent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">{{ $item->description }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)" class="link me-1">
                                        <i class="ti ti-star fs-4 favourite-note"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="link text-danger ms-2">
                                        <i class="ti ti-trash fs-4 remove-note"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>  
           
            <div class="tab-pane" id="note-social" role="tabpanel" aria-labelledby="note-social-tab">
                <div class="note-has-grid row">
                    @foreach ($note_social as $item)
                    <div class="col-md-4 single-note-item">
                        <div class="card card-body">
                            <span class="side-stick"></span>
                        
                            <h6 class="note-title text-truncate w-75 mb-0" data-noteHeading="Book a Ticket for Movie">{{ $item->title }}</h6>
                            <p class="note-date fs-2">{{ $item->note_date }}</p>
                            <div class="note-content">
                                <p class="note-inner-content" data-noteContent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">{{ $item->description }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="javascript:void(0)" class="link me-1">
                                    <i class="ti ti-star fs-4 favourite-note"></i>
                                </a>
                                <a href="javascript:void(0)" class="link text-danger ms-2">
                                    <i class="ti ti-trash fs-4 remove-note"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>  

        </div> 
        <!-- Modal -->
        @include('note.note-modal')
    </div>   
    
   <style>
        
   </style>
@endsection

@section('javascript')
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#add-notes').click(() => {
                $('#notesModal').modal('show');
            });

            // $('.nav-note-active').click((event) => {
            //     $('.nav-note-active').removeClass('active'); 
            //     $(event.currentTarget).addClass('active')
                 
            // });

            $('#saveNotes').click(function() {
                var url = $('#notesForm').attr('action');
                var title = $('#noteTitle').val();
                var description = $('#noteDescription').val();
                var datetime = $('#dateTime').val();
                var type = $('#noteType').val();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        title: title,
                        description: description,
                        note_date: datetime,
                        type: type
                    },
                    success: function (response) {
                        $('#notesModal').modal('hide');
                        toastr.success('Note saved successfully!');
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        
                        // errors.each(function(messages) {
                        //    toastr.error(messages);
                        // });
                    }
                });
            });

            $('#noteType').select2({
                minimumResultsForSearch: true
            });
          
        })
    </script>
@endsection
