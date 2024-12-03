

function confirmation(ev)
{
    ev.preventDefault(); //stop refreshimg

    var url = ev.currentTarget.getAttribute('href');

    swal({
        title: "Are you sure to Delete this",
        text: "This delete will be permanent",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })

    .then((willCancel)=>{
        if(willCancel)
            {
                window.location.href = url;
            }
    });
}
