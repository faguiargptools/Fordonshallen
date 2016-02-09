@include('admin.partials.header')
@include('admin.partials.topbar')
<div class="clearfix"></div>
<div class="page-container">

    @include('admin.partials.sidebar')

    <div class="page-content-wrapper">
        <div class="page-content">

            <h3 class="page-title">
                Fordonshallen | Admin
            </h3>

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="note note-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>

        </div>
    </div>
</div>

<div class="scroll-to-top"
     style="display: none;">
    <i class="fa fa-arrow-up"></i>
</div>
@include('admin.partials.javascripts')

@yield('javascript')

<script>
	$('.datatable').DataTable({
		"language":
		{
			"decimal":        "",
			"emptyTable":     "Ingen data finns tillgänglig.",
			"info":           "Visar rad _START_ till _END_ av _TOTAL_ rader",
			"infoEmpty":      "Visar 0 till 0 av 0 rader",
			"infoFiltered":   "(filtrerad från totalt _MAX_ rader)",
			"infoPostFix":    "",
			"thousands":      ",",
			"lengthMenu":     "Visa _MENU_ rader",
			"loadingRecords": "Laddar...",
			"processing":     "Bearbetar...",
			"search":         "Sök:",
			"zeroRecords":    "Inga matchande rader hittades",
			"paginate": {
				"first":      "Första",
				"last":       "Sista",
				"next":       "Nästa",
				"previous":   "Föregående"
			},
			"aria": {
				"sortAscending":  ": aktivera för att sortera stigande",
				"sortDescending": ": aktivera för att sortera fallande"
			}
		}
	});
</script>

@include('admin.partials.footer')


