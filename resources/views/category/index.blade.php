<x-app-layout>

	{{-- per page status --}}
	@if ( session('status') )
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
		</div>
	@endif

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Categories</h2>
		</div>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="{{ route('categories.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
				<i class="icon icon-xs me-2 bi bi-plus-lg"></i>
				Add Category
			</a>
		</div>
	</div>
	<div class="card card-body border-0 shadow table-wrapper table-responsive mb-5">
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="border-gray-200">Name</th>
					<th class="border-gray-200">Description</th>
					<th class="border-gray-200">Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($categories as $category)
					<tr>
						<td valign="middle">
							<span class="fw-normal">{{ $category->name }}</span>
						</td>
						<td valign="middle"><span class="fw-normal">{{ $category->description }}</span></td>
						
						<td valign="middle">
							<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-pill btn-outline-tertiary">Edit</a>

				          	<button class="btn btn-danger mt-2 animate-up-2" type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $category->id }}">Delete</button>
                            
							  <div class="modal fade" id="modal-delete-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<form action="{{ route('categories.destroy', $category) }}" method="POST">
						
											@csrf
											@method('DELETE')
						
											<div class="modal-header">
												<h2 class="h6 modal-title">Confirmation</h2>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<p>Are you sure you want to delete this category?</p>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-danger">Yes</button>
												<button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</td>
						
					</tr>
				@empty
					<tr class="text-center">
						<td colspan="5">No data.</td>
					</tr>
				@endforelse
			</tbody>
		</table>

		<div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">

			{{-- pagination --}}

		</div>

	</div>
</x-app-layout>