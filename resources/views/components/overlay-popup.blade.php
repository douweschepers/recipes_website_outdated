<script
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
        defer></script>

<div x-data="{ open: false }">
    <!-- Button to Open Modal -->
    <button
            @click="open = true"
            class="bg-blue-500 text-white px-4 py-2 rounded">Open Form
    </button>

    <!-- Modal -->
    <div
            id="myModal"
            x-show="open"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-lg font-bold mb-4">Enter Details</h2>
            <form id="saveForm">
                @csrf
                <div>
                    <label class="block">Name</label>
                    <label for="name"></label>
                    <input
                            type="text"
                            id="name"
                            name="name"
                            class="border p-2 w-full mb-3">
                </div>
                <div>
                    <label class="block">Measurement</label>
                    <label for="measurement"></label>
                    <input
                            type="text"
                            id="measurement"
                            name="measurement"
                            class="border p-2 w-full mb-3">
                </div>
                <div>
                    <label class="block">Default quantity</label>
                    <label for="defaultQuantity"></label>
                    <input
                            type="text"
                            id="defaultQuantity"
                            name="defaultQuantity"
                            class="border p-2 w-full mb-3">
                </div>
                <div class="flex justify-end">
                    <button
                            type="button"
                            @click="open = false"
                            class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Close
                    </button>
                    <button
                            type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded">Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



<script type="text/javascript">
    // let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // console.log(csrfToken)
	// $.ajaxSetup({
	// 	headers: {
	// 		'X-CSRF-TOKEN': csrfToken,
	// 	},
	// });
    //
	// $("#saveForm").validate({
    //
	// 	submitHandler: function () {
    //         console.log("getting herre");
	// 		var name = $("#name").val();
	// 		var measurement = $("#measurement").val();
	// 		var defaultQuantity = $("#defaultQuantity").val();
    //
    //
    //         // processing ajax request
	// 		$.ajax({
	// 			url: "http://localhost:8080/ingredient",
	// 			type: 'POST',
	// 			dataType: "json",
	// 			data: {
	// 				name: name,
	// 				measurement: measurement,
	// 				defaultQuantity: defaultQuantity,
	// 			},
	// 			success: function (data) {
    //             // log response into console
	// 				console.log(data);
	// 			},
	// 		});
	// 	},
	// });
    $("#saveForm").validate({
	    submitHandler: function () {
		    $.ajaxSetup({
			    headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			    }
		    });

		    console.log("getting here");

		    var name = $("#name").val();
		    var measurement = $("#measurement").val();
		    var defaultQuantity = $("#defaultQuantity").val();
		    var csrfToken = $('input[name="_token"]').val(); // Get CSRF token from form

		    // Processing AJAX request
		    $.ajax({
			    url: "http://localhost:8080/ingredient",
			    type: 'POST',
			    dataType: "json",
			    data: {
				    _token: csrfToken,  // Include CSRF token in the data
				    name: name,
				    measurement: measurement,
				    defaultQuantity: defaultQuantity,
			    },
			    success: function (data) {
				    console.log(data); // Log response into console
			    },
			    error: function (xhr, status, error) {
				    console.error("Error:", xhr.responseText);
			    }
		    });
	    },
    });

</script>



{{--<script>--}}
{{--	document.addEventListener("DOMContentLoaded", function () {--}}
{{--		let form = document.getElementById("saveForm");--}}

{{--		if (form) {--}}
{{--			form.addEventListener("submit", function (e) {--}}
{{--				e.preventDefault();--}}
{{--				console.log("Saving...");--}}

{{--				let formData = new FormData(this);--}}
{{--				// let modalElement = document.querySelector('[x-data]');--}}
{{--				// let alpineData = modalElement.__x.$data; // Get Alpine.js state--}}

{{--				// Disable the modal during submission--}}
{{--				// alpineData.open = false; // Close modal immediately when submitting--}}
{{--				let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');--}}
{{--				console.log(csrfToken);--}}

{{--				fetch("/ingredient", {--}}
{{--					method: "POST",--}}
{{--					body: formData,--}}
{{--					headers: {--}}
{{--						"X-CSRF-TOKEN": csrfToken,--}}
{{--						"Accept": "application/json",--}}
{{--					},--}}

{{--				})--}}
{{--					.then(response => {--}}
{{--						console.log(response);--}}
{{--					})--}}
{{--					.then(data => {--}}
{{--						console.log(data);--}}
{{--						// alert("Saved Successfully!");--}}
{{--						form.reset();--}}
{{--						// close pop up--}}
{{--						const modal = bootstrap.Modal.getInstance(document.getElementById("myModal"));--}}
{{--						modal.hide();--}}
{{--						// If you want to open the modal again, you can use alpineData.open = true;--}}
{{--					})--}}
{{--					.catch(error => console.log("Error: " + error.toString()));--}}
{{--			});--}}
{{--		}--}}
{{--	});--}}
{{--</script>--}}
