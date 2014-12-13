{% extends "layout/base.volt" %}

{% block title %}Display list of tasks{% endblock %}

{% block body %}
    <div class="list-group" style="margin-top:90px;">
        {% for task in tasks %}
        <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">{{ task.getName() }}</h4>
            <p class="list-group-item-text">{{ task.getDescription() }}</p>
        </a>
        {%  endfor %}
    </div>
{% endblock %}