function checkbox()
{
    if(document.getElementById("mycheck").checked==false)
    {
        document.getElementById("msg").innerHTML="Please check the checkbox!!";
    }
    else
    {
        document.getElementById("msg").innerHTML="Application submited";
    }
}