<?php

/* task/index.twig */
class __TwigTemplate_634c9ece557a9bb82e3dfd2cf1c6df99ee30deeece021692383cc066c20310b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("layout.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'stylesheet' => array($this, 'block_stylesheet'),
            'script' => array($this, 'block_script'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 3
        echo "\t";
        $this->displayParentBlock("stylesheet", $context, $blocks);
        echo "
";
    }

    // line 5
    public function block_script($context, array $blocks = array())
    {
        // line 6
        echo "\t<scirpt type=\"text/template\" id=\"item-template\">
\t\t<div class=\"view\">
\t\t\t<input type=\"checkbox\" class=\"toggle\" <%= completed ? 'checked=\"checked\"' : '' %>>
\t\t\t<label><%- title %></label>
\t\t\t<button class=\"destroy\"></button>
\t\t</div>
\t\t<input type=\"text\" class=\"edit\" value=\"<%- title %>\">
\t</scirpt>
\t<script type=\"text/template\" id=\"stats-template\">
\t\t<span id=\"todo-count\"><strong><%= remaining %></strong></span>
\t\t<%= remaining === 1 ? 'item' : 'items' %> left </span>
\t\t<ul id=\"filters\">
\t\t\t<li><a href=\"#\" class=\"selected\">All</a></li>
\t\t\t<li><a href=\"#\">Active</a></li>
\t\t\t<li><a href=\"#\">Completed</a></li>
\t\t</ul>
\t\t<% if (completed) { %>
\t\t\t<button id=\"clear-completed\">Clear completed (<%= completed %>)</button>
\t\t<% } %>
\t</script>
\t";
        // line 26
        $this->displayParentBlock("script", $context, $blocks);
        echo "
\t<script src=\"/js/underscore/underscore.js\"></script>
\t<script src=\"/js/backbone/backbone.js\"></script>
\t<script src=\"/js/backbone/backbone.localStorage.js\"></script>
\t<script src=\"/js/app/models/todo.js\"></script>
\t<script src=\"/js/app/collections/todos.js\"></script>
\t<script src=\"/js/app/views/todos.js\"></script>
\t<script src=\"/js/app/views/todos.js\"></script>
\t<script src=\"/js/app/routers/router.js\"></script>
\t<script src=\"/js/app/app.js\"></script>
";
    }

    // line 37
    public function block_content($context, array $blocks = array())
    {
        // line 38
        echo "<section id=\"todoapp\">
\t<header id=\"header\">
\t\t<h1>todos</h1>
\t\t<input type=\"text\" id=\"new-todo\" placeholder=\"What needs to be done ?\" autofocus=\"\">
\t</header>
\t<section id=\"main\">
\t\t<input type=\"checkbox\" id=\"toggle-all\">
\t\t<label for=\"toggle-all\">Mark all as complete</label>
\t</section>
\t<div id=\"info\">
\t\t<p>Double click to edit a todo</p>
\t</div>
</section>
";
    }

    public function getTemplateName()
    {
        return "task/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 38,  88 => 37,  73 => 26,  51 => 6,  48 => 5,  41 => 3,  38 => 2,  11 => 1,);
    }
}
