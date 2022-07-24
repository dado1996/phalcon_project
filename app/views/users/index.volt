<h1>User</h1>

{{ form('users/login') }}
    {{ text_field('username') }}
    {{ password_field('password') }}
    {{ submit_button('Login') }}
</form>

<h2>List</h2>

{% if single %}

    {{ single.id }}
    {{ single.email }}

    <hr />

    {% set first = single.project.getFirst().toArray() %}
    {{ first['id'] }}

    <hr />
{% else %}
    Nothing
{% endif %}

<hr />

<h2>All Users</h2>