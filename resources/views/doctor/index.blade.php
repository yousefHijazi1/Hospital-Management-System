<!--Replace with your tailwind.css once created-->
<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('style/dataTable.css') }}">

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

@extends('doctor.layout')

@section('content')

@if (session('appointment_done'))
    <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        {{ session('appointment_done') }}
    </div>
@endif

@if (session('failed'))
    <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        {{ session('failed') }}
    </div>
@endif
<body class="bg-gray-50 text-gray-900 tracking-wider leading-normal">


	<!--Container-->
	<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

		<!--Title-->
		{{-- <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
			<P>Patients Appointments</P>
		</h1> --}}
        <br>
        <h2>Appointments</h2>

		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

			<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
						<th data-priority="1">Name</th>
						<th data-priority="2">Email</th>
						<th data-priority="3">Birthdate</th>
						<th data-priority="4">Department</th>
						<th data-priority="5">Phone</th>
						<th data-priority="6">Time</th>
						<th data-priority="6">Message</th>
						<th data-priority="6">Action</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->email }}</td>
                            <td>{{ $appointment->birthDate }}</td>
                            <td>{{ $appointment->department }}</td>
                            <td>{{ $appointment->phone }}</td>
                            <td>{{ $appointment->{'appointment-time'} }}</td>
                            <td>{{ $appointment->message }}</td>
                            <td>
                                <a href="{{ route('appointment_delete', ['id' => $appointment->id]) }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{ $appointment->id }}').submit();">
                                    Finish
                                </a>

                                <form id="delete-form-{{ $appointment->id }}"
                                    action="{{ route('appointment_delete', ['id' => $appointment->id]) }}"
                                    method="POST"
                                    style="display: none;" >
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
					<!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
				</tbody>
			</table>
		</div>
		<!--/Card-->
	</div>
	<!--/container-->

	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true,
                    lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
                    pageLength: 5
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>

</body>

@endsection
