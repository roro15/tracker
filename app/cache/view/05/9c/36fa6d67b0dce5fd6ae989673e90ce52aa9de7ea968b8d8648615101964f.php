<?php

/* user/index.twig */
class __TwigTemplate_059c36fa6d67b0dce5fd6ae989673e90ce52aa9de7ea968b8d8648615101964f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.twig");

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
        echo "\t";
        $this->displayParentBlock("script", $context, $blocks);
        echo "
\t<script src=\"/js/underscore/underscore.js\"></script>
\t<script src=\"/js/backbone/backbone.js\"></script>
\t<script src=\"/js/app/app.js\"></script>
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "<h1>XA XA XA it ";
        echo twig_escape_filter($this->env, (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")), "html", null, true);
        echo "</h1>
";
    }

    public function getTemplateName()
    {
        return "user/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 12,  53 => 11,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
