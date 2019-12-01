const Utils = {}

Utils.fetchResolverHandler = function () {
    return (response) => {
        if (response.status >= 200 && response.status < 300) {
            return Promise.resolve(response);
        }
        
        return Promise.reject(new Error(response.statusText));
    }
}

Utils.windowTopDownScrollHandler = function (topCallback, downCallback) {
    var previousScrollPosition = 0
    
    window.addEventListener('scroll', () => {     
      //scroll up
      if ((document.body.getBoundingClientRect()).top > previousScrollPosition) {
          topCallback()
      }
      //scroll down
      if ((document.body.getBoundingClientRect()).top < previousScrollPosition) {
          downCallback()
      }
      
      previousScrollPosition = (document.body.getBoundingClientRect()).top
    })
}

Utils.redirectTo = function (linkLocation, $duration = 3000) {
    setTimeout(function() {
        window.location = linkLocation;
    }, $duration);
}

Utils.notify = function notify($el, $prop = {}) {
    //Define an initial notification identifiers
    let $idContainer = $prop.$idContainer || 'notify-container', 
        $containerClass = $prop.$containerClass || 'container-notify', 
        $containerPosition = $prop.$containerPosition || 'top', 
        $buttonClass = $prop.$buttonClass || 'notify-close-button', 
        $notifyClass = $prop.$notifyClass || 'notify';
        $notifyPosition = $prop.$notifyPosition || 'notify-center', 
        $duration = $prop.$duration || 20000, 
        $message = $prop.$message || 'Psudo message', 
        $type = $prop.$type || 'info';

    Notify.createContainer(
        $idContainer, 
        $containerClass, 
        $containerPosition
    );

    Notify.setMessage($message);
    Notify.setType($type);
    Notify.createMessageTemplate();
    Notify.createCloseButton($buttonClass);
    Notify.createNotifyTemplate($notifyClass, $notifyPosition);
    Notify.make($el, $duration);
}