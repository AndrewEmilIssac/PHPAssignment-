<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div>
    <h3>Select a Category:</h3>
    <select id="mainCategory">
        <option value="">--Select a Category--</option>
    </select>
</div>

<div>
    <h3>Select a Subcategory:</h3>
    <select id="subCategory">
        <option value="">--Select a Subcategory--</option>
    </select>
</div>

<div>
    <h3>Select a Sub-Subcategory:</h3>
    <select id="subSubCategory">
        <option value="">--Select a Sub-Subcategory--</option>
    </select>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Populate main categories select box
        $.ajax({
            url: "{{ route('get-main-categories') }}",
            type: "GET",
            success: function(categories) {
                $.each(categories, function(key, category) {
                    $('#mainCategory').append('<option value="'+category.id+'">'+category.name+'</option>');
                });
            }
        });

        // On main category selection, populate subcategories select box
        $('#mainCategory').on('change', function() {
            var parent_id = $(this).val();

            if(parent_id) {
                $.ajax({
                    url: "{{ route('get-subcategories') }}",
                    type: "POST",
                    data: {parent_id: parent_id, _token: $('meta[name="csrf-token"]').attr('content')},
                    success: function(subcategories) {
                        $('#subCategory').empty();
                        $('#subSubCategory').empty();
                        $('#subCategory').append('<option value="">--Select a Subcategory--</option>');
                        $.each(subcategories, function(key, subcategory) {
                            $('#subCategory').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                        });
                    }
                });
            }
            else {
                $('#subCategory').empty();
                $('#subSubCategory').empty();
                $('#subCategory').append('<option value="">--Select a Subcategory--</option>');
            }
        });

        // On subcategory selection, populate sub-subcategories select box
        $('#subCategory').on('change', function() {
            var parent_id = $(this).val();

            if(parent_id) {
                $.ajax({
                    url: "{{ route('get-subcategories') }}",
                    type: "POST",
                    data: {parent_id: parent_id, _token: $('meta[name="csrf-token"]').attr('content')},
                    success: function(subcategories) {
                        $('#subSubCategory').empty();
                        $('#subSubCategory').append('<option value="">--Select a Sub-Subcategory--</option>');
                        $.each(subcategories, function(key, subcategory) {
                            $('#subSubCategory').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                        });
                    }
                });
            }
            else {
                $('#subSubCategory').empty();
                $('#subSubCategory').append('<option value="">--Select a Sub-Subcategory--</option>');
            }
        });
    });

</script>

</body>
</html>
