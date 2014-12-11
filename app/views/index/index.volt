{% extends "layout/base.volt" %}

{% block title %}
        This is the title for index action in index controller
{% endblock %}

{% block body %}
    <h1>{{ test|trim }}</h1>
    <h2>array test</h2>
    <div>
        {% for index, el in arr %}
            <p>
                {% if index is even %}
                    {{ el|upper }}
                {% else %}
                    {{ el }}
                {% endif %}
            </p>
        {% endfor %}
        <p></p>
    </div>
{% endblock %}