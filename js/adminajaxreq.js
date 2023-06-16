function adlogin(){
    
    var ademail = $("#ademail").val();
    var adpass = $("#adpass").val();
    $.ajax({ 
        url:"admin/admin.php",
        method: "POST",
        data:{
            check: "checking",
            ademail: ademail,
            adpass: adpass,     
        },
        success:function(data){
            if (data == 0){
                $("#admsg").html("<small class='alert alert-danger'>Invalid E-mail id or Password!</small>")
            }
            else if (data == 1){
                $("#admsg").html("<small class='alert alert-success'>success!</small>")
                setTimeout(()=>{
                    window.location.href = "admin/admindashboard.php";

                }, 1000);
            }   

        },

    });
}