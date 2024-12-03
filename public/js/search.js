$(document).ready(function () {
    $('#search-input').on('input', function () {
        let query = $(this).val();

        if (query.length >= 2) {
            $.ajax({
                url: "{{ url('autocomplete') }}",
                data: { term: query },
                success: function (data) {
                    let suggestions = data.map(title => `<li>${title}</li>`).join('');
                    $('#autocomplete-results').html(`<ul>${suggestions}</ul>`).show();
                }
            });
        } else {
            $('#autocomplete-results').hide();
        }
    });

    $(document).on('click', function () {
        $('#autocomplete-results').hide();
    });

    $(document).on('click', '#autocomplete-results li', function () {
        let selectedValue = $(this).text();
        $('#search-input').val(selectedValue);
        $('#autocomplete-results').hide();
    });
});