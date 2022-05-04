var count = 0;
var i = true;
var num3;
$(document).ready(function () {
    $("#btn").click(function () {
        var num1 = parseInt($("#in1").val());
        var num2 = parseInt($("#in2").val());
        num3 = num1 * num2;
        count++;
        // window.alert(num3);
        if ($("#in1").val() == "" || $("#in2").val() == "") {
            window.alert("Enter values");
        } else {
            $("table").append(`<tr id="${count}"><td class="row" id="${count}d1">${num1}</td><td id="${count}d2">${num2}</td><td id="${count}d3">${num3}</td><td><button class="btn_del">Delete</button><button class="btn_add" id=edit${count} onclick="editData(${count})">Edit</button></td></tr>`)
            $("#in1").val("");
            $("#in2").val("");
        }

    });
});
$(document).on("click", '.btn_del', function () {
    $(this).closest('tr').remove();
});

function editData(value) {
    if (i) {
        let no1 = $(`#${value}d1`).text();
        let no2 = $(`#${value}d2`).text();
        // $(this).parents("tr").find("td:eq(0)") 
        $(`#edit${value}`).parents("tr").replaceWith(`<tr class="row" id="${value}"><td id="${value}d1"><input class="text_in" type="text" id="t1${value}" value="${no1}"></td><td id="${value}d2"><input class="text_in" type="text" id="t2${value}" value="${no2}"></td><td id="${value}d3">${no1 * no2}</td><td><button class="btn_del">Delete</button><button class="btn_add" id=edit${value} onclick="editData(${value})">Edit</button></td></tr>`);
        i = !i;
    } else {
        let n1 = parseInt($(`#t1${value}`).val());
        let n2 = parseInt($(`#t2${value}`).val());
        let n3 = n1 * n2;
        // var t1 = `<td id="${value}d1">${n1}</td>`;
        // var t2 = `<td id="${value}d2">${n2}</td>`;
        $(`#t1${value}`).replaceWith(`<td id="${value}d1">${n1}</td>`);
        $(`#t2${value}`).replaceWith(`<td id="${value}d2">${n2}</td>`);
        $(`#${value}d3`).text(n3);
        i = !i;
    }
    console.log(i);


}
