<x-app-layout>

	 {{-- modal --}}
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
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

	
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Edit Contacts</h2>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-8">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Category information</h2>

				<form method="POST" action="{{ route('categories.update',$category->id) }}">
					@csrf
					{{-- for update --}}
                    @method('PUT')
					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Name" value="{{ old('name', $category->name) }}">
								@error('name')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="descrition">Description</label>
								<input class="form-control @error('descrition') is-invalid @enderror" id="description" name="description" type="text" placeholder="Description" value="{{ old('description', $category->description) }}" required>
								@error('descrition')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						
					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update</button>
					</div>

				</form>
			</div>
		</div>
		{{-- Delete Contact --}}
		<div class="card card-body border-0 shadow mb-4">
			<h2 class="h5 mb-4">Delete User</h2>
			
			<div class="row">
				<div class="col-md-3">
					<button class="btn btn-danger mt-2 animate-up-2" type="button" data-bs-toggle="modal" data-bs-target="#modal-delete">Delete</button>
				</div>
			</div>

		</div>
	</div>
</x-app-layout>