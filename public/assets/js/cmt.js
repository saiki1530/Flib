const clickElement = document.querySelectorAll('#reply-click');
        
        clickElement.forEach(function (item){
            item.addEventListener('click',function(){
                var replyElement = this.closest(".cmt").querySelector("#reply");
                console.log(replyElement)
                // const replyElement = document.getElementById('reply');
                if (replyElement.classList.value.includes('click')) {
                    console.log('Phần tử chứa lớp "click"');
                    replyElement.classList.remove('item-form-reply-click');
                    replyElement.classList.add("item-form-reply");
                } else {
                    console.log('Phần tử không chứa lớp "click"');
                    replyElement.classList.remove('item-form-reply');
                    replyElement.classList.add("item-form-reply-click");
                }
            })
        })