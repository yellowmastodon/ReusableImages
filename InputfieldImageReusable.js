/*****************************************************************************************************************
 * InputfieldImageReusable
 * 
 * Copyright 2025 by Juraj Mydla
 * 
 */

class InputfieldImageReusable {
    constructor(
        el,
        options = {})
    {
        const defaultOptions = {
            containerSelector: '.InputfieldContent',
            reuseModalTriggerSelector: '.ReuseModalTrigger',
        };
        this.options = { ...defaultOptions, ...options };
        this.container = el.querySelector('.InputfieldContent');
        this.reuseModalTrigger = this.container.querySelectorAll('.ReuseModalTrigger');
        this.init();
    }
    init() {
        console.log(this);
        this.bindModalTriggerDialog(this.reuseModalTrigger);
    }

    bindModalTriggerDialog(el){
        console.log(el);
        this.reuseModalTrigger.forEach(
            (el)=>{
                el.addEventListener('click', this.dialog);
            }
        )
    }


    static initAll(selector = '.InputfieldImageReusable') {
        const elements = document.querySelectorAll(selector);
        console.log(selector);
        console.log(elements);
        elements.forEach((el) => new InputfieldImageReusable(el));
    }

    dialog(url) {
        event.preventDefault();
        console.log('dialog');
        const $iframe = pwModalWindow(
				url,
				{
					close: function () {
						if(typeof onClose === 'function') onClose.call(this, $iframe);
					}
				},
				'large'
        );
    }

}


document.addEventListener('DOMContentLoaded', function () {
   InputfieldImageReusable.initAll();
});