var serverPath = "http://localhost/api-sample/public/api/";


function show()
{
    return $.ajax({
        type: "GET",
        url: serverPath + "listbukushow",
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
}

function showbyid(id)
{
    return $.ajax({
        type: "GET",
        url : serverPath + "listbukushow/" + id,
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
}

function simpan(formData)
{
    $.ajax({
        type: "POST",
        url : serverPath + "listbuku",
        data: formData,
        success: function() {
            window.location.replace("index.php?success=insert");
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
}

function update(formData, id)
{
    $.ajax({
        type: "PUT",
        url : serverPath + "listbukuupdate/" + id,
        data: formData,
        success: function() {
            window.location.replace("index.php?success=update");
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
}

function deletedata(id)
{
    $.ajax({
        type: "DELETE",
        url : serverPath + "listbukudelete/" + id,
        success: function() {
            window.location.replace("index.php?success=delete");
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
}