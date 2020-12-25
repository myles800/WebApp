"use strict";
$(function () {
    console.log("show.js loaded");
    let SERVERURI;
    if (window.location.host === "myles.digital") {
        SERVERURI = window.location.protocol + "//" + "www.myles.digital";
    } else {
        SERVERURI = window.location.protocol + "//" + "myles.digital";
    }
    show(SERVERURI);

    $('#create').click(() => {
            $("#id").val("");
            $("#name").val("");
            $("#price").val("");
            $("#code").val("");
            $("#title").text("Create");

            $('#modal').show();
        }
    );
    $('#close').click(() => {
            $('#modal').hide();
        }
    );
    $('#submit').click(() => {
        if ($("#id").val() === "") {
            create(SERVERURI)
                .then(data => {
                    console.log(data);
                });
        } else {
            update(SERVERURI)
                .then(data => {
                    console.log(data);
                });
        }
        $('#modal').hide();
        show(SERVERURI);

    });


});

function clrShow() {
    $('#product').empty()
}

function show(SERVERURI) {
    clrShow();
    fetch(SERVERURI + '/api/products', {
        "headers": {
            "Accept": "application/json",
            "content-type": "application/json"
        }, "method": "GET", "mode": "cors"
    })
        .then(response => response.json())
        .then((data) => {
            for (let product of data) {
                let tr = $('<tr>');
                let th1 = $('<th>')
                    .text(product.name);
                let th2 = $('<th>')
                    .text("€" + product.price);
                let th3 = $('<th>')
                    .text(product.code);

                let th4 = $('<th>');
                let btn1 = $('<button>')
                    .attr("type", "button").addClass("btn btn-info edit").attr("id", "edit" + product.id);
                let i1 = $('<i>')
                    .addClass("fas fa-edit").css("color", "white");
                let th5 = $('<th>');
                let btn2 = $('<button>')
                    .attr("type", "button").addClass("btn btn-danger delete").attr("id", "delete" + product.id);
                let i2 = $('<i>')
                    .addClass("fas fa-trash-alt");
                btn1.append(i1);
                th4.append(btn1);
                btn2.append(i2);
                th5.append(btn2);
                tr
                    .append(th1)
                    .append(th2)
                    .append(th3)
                    .append(th4)
                    .append(th5);


                $('#product')
                    .append(tr);


            }
            $('button.edit').click((e) => {
                let id = $(e.target).attr('id');
                if ($(e.target).attr('id') === undefined) {
                    id = $(e.target).parent().attr('id');
                }
                id = id.replace("edit", "");
                getOnId(SERVERURI, id);
                $("#title").text("Update");
                $('#modal').show();
            });
            $('button.delete').click((e) => {
                let id = $(e.target).attr('id');
                if ($(e.target).attr('id') === undefined) {
                    id = $(e.target).parent().attr('id');
                }
                id = id.replace("delete", "");
                del(SERVERURI, id);
            });
        });

}

function getOnId(SERVERURI, id) {
    fetch(SERVERURI + '/api/products/' + id, {
        "headers": {
            "Accept": "application/json",
            "content-type": "application/json",
            "Authorization": "Bearer IJONQezQkWJqBTPeysXxtCPEzzHKgNB0giOBGbUQ",
        }, "method": "GET", "mode": "cors"
    })
        .then(response => response.json())
        .then((data) => {
            data = data[0];
            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#price").val(data.price);
            $("#code").val(data.code);
        });
}

async function create(SERVERURI = '') {
    let data = {'name': $("#name").val(), 'price': $("#price").val(), 'code': $("#code").val()};
    const response = await fetch(SERVERURI + "/api/products", {
        method: 'POST',
        mode: 'cors',
        headers: {
            "Accept": "application/json",
            "content-type": "application/json",
            "Authorization": "Bearer IJONQezQkWJqBTPeysXxtCPEzzHKgNB0giOBGbUQ",
        },
        body: JSON.stringify(data)
    });
    return response.json();
}

async function update(SERVERURI = '') {
    let data = {'name': $("#name").val(), 'price': $("#price").val(), 'code': $("#code").val()};
    const response = await fetch(SERVERURI + "/api/products/" + $("#id").val(), {
        method: 'PUT',
        mode: 'cors',
        headers: {
            "Accept": "application/json",
            "content-type": "application/json",
            "Authorization": "Bearer IJONQezQkWJqBTPeysXxtCPEzzHKgNB0giOBGbUQ",
        },
        body: JSON.stringify(data)
    });
    $("#id").val("");
    $("#name").val("");
    $("#price").val("");
    $("#code").val("");
    return response.json();
}

async function del(SERVERURI = '', id) {
    const response = await fetch(SERVERURI + "/api/products/" + id, {
        method: 'DELETE',
        mode: 'cors',
        headers: {
            "Accept": "application/json",
            "content-type": "application/json",
            "Authorization": "Bearer IJONQezQkWJqBTPeysXxtCPEzzHKgNB0giOBGbUQ",
        },
    });
    show(SERVERURI);

    return response.json();
}
