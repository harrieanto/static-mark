class Notify {
    static createMessageTemplate() {
        let $message = document.createElement('span');
        $message.innerHTML = this.getMessage();
        this.$messageTemplate = $message;
    }

    static createContainer($id, $class, $position) {
        this.$idContainer = $id;
        this.$containerPosition = $position;
        let $container = document.createElement('div');

        $container.className = $class+' '+$position;
        $container.id = $id;
        document.body.appendChild($container);
    }
    
    static createBar($content, $class = null) {
        let $span = document.createElement('span'), 
            $spanChild = document.createElement('span');
        
        $spanChild.textContent = $content;
        $span.className = $class || 'notify-info';
        $span.innerHTML = $spanChild.outerHTML;
        
        return $span.outerHTML;
    }
    
    static createCloseButton($class) {
        let $closeButton = document.createElement('a');
        $closeButton.className = $class;
        $closeButton.innerHTML = '&times;';
        
        this.$closeButton = $closeButton;
        
        this.closeNotifyWhenClicked();
    }
    
    static closeNotifyWhenClicked() {
        this.$closeButton.addEventListener('click', function(e) {
            let $parent = e.target.parentElement;
            $parent.style.display = 'none';
        });
    }
    
    static createNotifyTemplate($class, $position) {
        let $container = document.createElement('div');

        $container.className = $class+' '+$position+' '+this.getType();
        $container.appendChild(this.$closeButton);
        $container.appendChild(this.$messageTemplate);
        
        this.$template = $container;
    }
    
    static make($el, $duration) {
        let $container = document.getElementsByClassName(this.$containerPosition), 
            $template = this.$template;

        $container[0].appendChild($template);
        
        setTimeout(function() {
            $template.style.display = 'none';
        }, $duration);
    }
    
    static setMessage($value) {
        this.$message = $value;
    }
    
    static getMessage() {
        return this.$message;
    }

    static setType($value) {
        this.$type = $value;
    }
    
    static getType() {
        return this.$type;
    }
}