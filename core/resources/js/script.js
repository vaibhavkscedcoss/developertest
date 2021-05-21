var base_url = 'http://localhost/DevloperTest/';

$(document).on('click', '#search1', function () {
    var html = '';
    var searchValue = $('#movie').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: 'POST',
        url: base_url + 'showdata',
        dataType: 'json',
        data: {
            'searchValue': searchValue,
        },
        success: function (response) {
            var data = response.data;
            console.log(response);
            for (let i = 0; i < data.length; i++) {
                const element = data[i];
                html += '<tr bgcolor=' + data[i].color + '>';
                html += '<th scope="row">' + (i + 1) + '</th>';
                html += '<td>' + data[i].title + '</td>';
                html += '<td>' + data[i].year + '</td>';
                html += '<td>' + data[i].type + '</td>';
                html += '<td><img src=' + data[i].image + 'width="100" height="100"></td>';
                html += '</tr>';
            }
            $('.table').css('display', 'inline-table');

            $("#movieData").html(html);

        },

        error: function () {
            html = '';
            $('.table').css('display', 'inline-table');
            html += '<td>No Data Found</td>';
            $("#movieData").html(html);
        }
    });
});
