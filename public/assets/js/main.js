function deleteAccount(accountID)
{
    $.ajax({
        type: "POST",
        url: "/deleteaccount",
        data: accountID ,
        dataType: "json",
      });

      console.log(accountID);
}