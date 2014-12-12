{% extends "layout/base.volt" %}

{% block title %}Display list of tasks{% endblock %}

{% block body %}
<table>
    <thead>
        <tr>
            <th>name</th>
            <th>description</th>
        </tr>
    </thead>
    <tbody>
    {% for task in tasks  %}
    <tr>
        <td>{{ task.getName() }}</td>
        <td>{{ task.getDescription() }}</td>
    </tr>
    {% endfor %}
    </tbody>
</table>
{% endblock %}