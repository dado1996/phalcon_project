<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
        {{ assets.outputCss() }}
    </head>
    
    <body>
        
        {% for i in view.users %}
            {{ i.id|e }}
            {{ i.name }}
            {{ i.email|e }}
            {{ i.created_at }}
            <br />
            {% endfor %}
            
        {{ assets.outputJs() }}
    </body>

</html>
