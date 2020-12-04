(() => {
   
    let deleteButtons = document.getElementsByClassName('btn_delete_post');

    for(let i = 0; i < deleteButtons.length; i++) { 
        deleteButtons[i].addEventListener("click", deletePost) ;
    } 

    let updateButtons = document.getElementsByClassName('btn_update_post');

    for(let i = 0; i < updateButtons.length; i++) { 
        updateButtons[i].addEventListener("click", updatePost) ;
    } 

    let cancelUpdateButtons = document.getElementsByClassName('btn_cancel_update_post');
    for(let i = 0; i < cancelUpdateButtons.length; i++) { 
        cancelUpdateButtons[i].addEventListener("click", cancelUpdateupdatePost) ;
    } 
}  )();


function deletePost()
{
    let postId = this.getAttribute("data-postId");
    let topicId = this.getAttribute("data-topicId");
    $.ajax({
        url: `/pages/deletePost.php?id=${postId}`,
        type: 'delete',
       
        success: function(response){
            if(response == '')
            {
                window.location.href = `/pages/topicRead.php?id=${topicId}`;
            }
            else
            {
                alert(response);
            }
        } 
    });
}


function updatePost()
{
    let postId = this.getAttribute("data-postId");

    SetPostEdition(postId,true);
    
}

function cancelUpdateupdatePost()
{
    let postId = this.getAttribute("data-postId");

    SetPostEdition(postId,false);
    
}


function SetPostEdition(postId, active)
{
    let form = document.getElementById('form_editPost_' + postId);
    form.hidden = !active;

    let p = document.getElementById('postContent_' + postId);
    p.hidden = active;
}

    
    
