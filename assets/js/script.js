const app = {
    init: () => {
        $('.filter').change(app.handleFilterChange);
    },
    handleFilterChange: () => {
        const filterData = {};
        $('.filter :selected').each(function () {
            filterData[$(this).parent().attr("name")] = $(this).val();
        });

        $.ajax({
            method: "GET",
            url: "http://localhost:8000/api/filter",
            data: filterData,
        })
            .then(function (response) {
                const dataFromDb = JSON.parse(response);
                $('tbody').empty();

                $.each(dataFromDb, function (index, element) {
                    const tr = $("<tr></tr>").css("font-style", "normal");
                    const td1 = $("<td></td>");
                    const td2 = $("<td>" + element['worksiteName'] + "</td>");
                    const td3 = $("<td>" + element['serviceName'] + "</td>");
                    const td4 = $("<td><a class='btn btn-xs btn-danger' ><i class='fa fa-trash'></i></a></td>")
                    tr.append(td1);
                    tr.append(td2);
                    tr.append(td3);

                    $.each(element['months_list'], function (index, element) {
                        const td = $("<td>" + element + "</td>")
                        tr.append(td);
                    })

                    tr.append(td4);
                    $("tbody").append(tr);
                })

            })
            .catch(function (error) {
                console.log('error=>', error.responseText);
            });
    }
};
$(app.init);