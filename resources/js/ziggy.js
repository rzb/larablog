    var Ziggy = {
        namedRoutes: {"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"forgot-password","methods":["POST"],"domain":null},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"reset-password","methods":["POST"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"],"domain":null},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"],"domain":null},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"],"domain":null},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"],"domain":null},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"],"domain":null},"current-user.destroy":{"uri":"user","methods":["DELETE"],"domain":null},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"],"domain":null},"api-tokens.index":{"uri":"user\/api-tokens","methods":["GET","HEAD"],"domain":null},"api-tokens.store":{"uri":"user\/api-tokens","methods":["POST"],"domain":null},"api-tokens.update":{"uri":"user\/api-tokens\/{token}","methods":["PUT"],"domain":null},"api-tokens.destroy":{"uri":"user\/api-tokens\/{token}","methods":["DELETE"],"domain":null},"posts.index":{"uri":"\/","methods":["GET","HEAD"],"domain":null},"posts.show":{"uri":"posts\/{id}","methods":["GET","HEAD"],"domain":null},"dashboard.my-posts.index":{"uri":"dashboard\/my-posts","methods":["GET","HEAD"],"domain":null},"dashboard.my-posts.create":{"uri":"dashboard\/my-posts\/create","methods":["GET","HEAD"],"domain":null},"dashboard.my-posts.store":{"uri":"dashboard\/my-posts","methods":["POST"],"domain":null},"dashboard.my-posts.show":{"uri":"dashboard\/my-posts\/{my_post}","methods":["GET","HEAD"],"domain":null},"dashboard.my-posts.edit":{"uri":"dashboard\/my-posts\/{my_post}\/edit","methods":["GET","HEAD"],"domain":null},"dashboard.my-posts.update":{"uri":"dashboard\/my-posts\/{my_post}","methods":["PUT","PATCH"],"domain":null},"dashboard.my-posts.destroy":{"uri":"dashboard\/my-posts\/{my_post}","methods":["DELETE"],"domain":null}},
        baseUrl: 'http://larablog.test/',
        baseProtocol: 'http',
        baseDomain: 'larablog.test',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
