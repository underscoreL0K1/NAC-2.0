function acc
{
if(document.cookie == null)
{
 var name = prompt("enter a username", "");
 var pass = prompt("enter a password","");
 if(true)//replace true with if account exists and if pass matches
 {
  sign_in()
 }
 else
 {
  var store = name+'|'+pass
  document.cookie="person=" + store
  //add something here that adds store to the .txt file
 }
}
  else
  {
   if(true)//check if password matches
    sign_in()
  }
}
function sign_in()
{
 var cookie=document.cookie
 if(cookie.inculdes(';')){console.log('error code 1')}//cookie error
 else
 {
  let cookies = cookie.split('|')
  document.getElementById("name display").value = " Send Message As: " + cookies[0];
 }
}
