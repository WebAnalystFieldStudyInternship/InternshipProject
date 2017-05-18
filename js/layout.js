import bsn from "bootstrap.native"

if(document.body.id === 'mainPage') {
    let mapChildren = document.querySelector('#map').children;

    for (let curELement of mapChildren) {
        let curId = `${curELement.id.charAt(0).toUpperCase()}${curELement.id.slice(1).toLowerCase()}`;

        if(curELement.hasAttribute('class') === true) {
            curELement.style.fill = '#fff';

            curELement.onmouseover = () => {
                curELement.style.fill = '#f00';
                for (let curALL of mapChildren) {
                    if(curALL.innerHTML === curId) {
                        document.getElementById("countyName").innerHTML = `${curId} County, Wisconsin`;
                    }
                }
            };
            curELement.onmouseout = () => {
                curELement.style.fill = '#fff'
            };

            curELement.onclick = () => {
                resourceList(curId, curELement.className.baseVal)
            }
        }
    }
} else if((document.querySelector('#curPage').value === 'adminHome') || (document.querySelector('#curPage').value === 'adminAdd')) {
    document.querySelectorAll('body > nav > div > ul > li').forEach((cur) => {
        if(cur.classList.contains('active')) {
            cur.classList.remove('active');
        }

        switch (cur.children[0].innerHTML) {
            case 'Home':
                if(document.querySelector('#curPage').value === 'adminHome') {
                    cur.classList.add('active');
                }
                break;
            case 'Add':
                if(document.querySelector('#curPage').value === 'adminAdd') {
                    cur.classList.add('active');
                }
                break;
        }
    });
}