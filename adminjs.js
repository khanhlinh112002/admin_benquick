function dashboard() {

    document.getElementById('product').style.display = 'none';
    document.getElementById('bill').style.display = 'none';
    document.getElementById('user').style.display = 'none';
    document.getElementById('home-content').style.display = 'block';

};


function postManager() {
    document.getElementById('create').style.display = 'block';
    document.getElementById('product').style.display = 'block';
    document.getElementById('bill').style.display = 'none';
    document.getElementById('user').style.display = 'none';
    document.getElementById('home-content').style.display = 'none';
};

function userManager() {
    document.getElementById('create').style.display = 'none';
    document.getElementById('product').style.display = 'none';
    document.getElementById('bill').style.display = 'none';
    document.getElementById('home-content').style.display = 'none';
    document.getElementById('user').style.display = 'block';
};

function contactManager() {
    document.getElementById('home-content').style.display = 'none';
    document.getElementById('bill').style.display = 'block';

    document.getElementById('product').style.display = 'none';
    document.getElementById('user').style.display = 'none';
};
$('[name="file[]"]').change(function() {
    displayUpload(this)
})

function displayUpload(input) {
    if (input.files) {
        Object.keys(input.files).map(function(k) {
            var reader = new FileReader();
            console.log(reader, 'hihi')
            var t = input.files[k].type;
            var _types = ['image/x-png', 'image/png', 'image/gif', 'image/jpeg', 'image/jpg'];
            if (_types.indexOf(t) == -1)
                return false;
            reader.onload = function(e) {
                // $('#cimg').attr('src', e.target.result);
                console.log(e, 'hihi1')
                var bin = e.target.result;
                var fname = input.files[k].name;
                var imgF = document.getElementById('img-clone');
                imgF = imgF.cloneNode(true);
                imgF.removeAttribute('id')
                imgF.removeAttribute('style')
                var img = document.createElement("img");
                var fileinput = document.createElement("input");
                var fileinputName = document.createElement("input");
                fileinput.setAttribute('type', 'hidden')
                fileinputName.setAttribute('type', 'hidden')
                fileinput.setAttribute('name', 'img[]')
                fileinputName.setAttribute('name', 'imgName[]')
                fileinput.value = bin
                fileinputName.value = fname
                img.classList.add("imgDropped")
                img.src = bin;
                imgF.appendChild(fileinput);
                imgF.appendChild(fileinputName);
                imgF.appendChild(img);
                document.querySelector('#file-display').appendChild(imgF)
            }
            reader.readAsDataURL(input.files[k]);
        })
        rem_func(input)
    }
}

function rem_func(_this) {
    _this.closest('.imgF').remove()
    if ($('#drop .imgF').length <= 0) {
        $('#drop').append('<span id="dname" class="text-center">Drop Files Here <br> or <br> <label for="chooseFile"><strong>Choose File</strong></label></span>')
    }
}
$(document).ready(function() {
    $('.view_datapost').click(function() {
        var idPost = $(this).attr("id");
        $.ajax({
            url: "./select.php",
            method: "post",
            data: { idPost: idPost },
            success: function(data) {
                $('#post_detail').html(data);
                $('#dataModalpost').modal("show");
            }
        });
    });
});
$(document).ready(function() {
    $('.deletePost').click(function() {
        var idPost = $(this).attr("id");
        $.ajax({
            url: "./deletePost.php",
            method: "post",
            data: { idPost: idPost },
            success: function(data) {
                $('#confirmdeletePost').html(data);
                $('#dataModaldeletePost').modal("show");
            }
        });
    });
});
$(document).ready(function() {
    $('.view_datacontact').click(function() {
        var contact_id = $(this).attr("id");
        $.ajax({
            url: "./select.php",
            method: "post",
            data: { contact_id: contact_id },
            success: function(data) {
                $('#contact_detail').html(data);
                $('#dataModalcontact').modal("show");
            }
        });
    });
});
$(document).ready(function() {
    $('.view_dataaccount').click(function() {
        var account_id = $(this).attr("id");
        $.ajax({
            url: "./select.php",
            method: "post",
            data: { account_id: account_id },
            success: function(data) {
                $('#account_detail').html(data);
                $('#dataModalaccount').modal("show");
            }
        });
    });
});