window.onload = function(){

    let btnCopy = document.querySelectorAll('.btn-copy');
    // console.log(btnCopy)

    for(let i = 0; i < btnCopy.length; i++){
        btnCopy[i].addEventListener('click', function(){
            let copyTarget = document.getElementById(`copy-${i}`);
            let copyBtn = document.getElementById(`btn-${i}`);
            // console.log(copyBtn.textContent);
            // console.log(copyTarget);
            document.getSelection().selectAllChildren(copyTarget);
            document.execCommand("copy");
            document.getSelection().empty(copyTarget);
            
            copyBtn.classList.add('is-active');

            if(copyBtn.classList.contains('is-active')){
                copyBtn.textContent = "Copied";
            }

            timerId = setTimeout( function() {
                copyBtn.textContent = "Copy";
                copyBtn.classList.remove('is-active');
            } , 5000 );

        });
    }

};

// 1. クラス取得　リストになる
// 2. 取得した分for文回す
// 3. id-i で指定する


// 1. is-activeつける
// toggle

// 2. is-activeのときだけcopied
// textContent

// 3. is-activeをふわっと出す

