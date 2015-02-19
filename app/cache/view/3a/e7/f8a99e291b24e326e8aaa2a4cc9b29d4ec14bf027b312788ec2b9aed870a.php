<?php

/* layout.twig */
class __TwigTemplate_3ae7f8a99e291b24e326e8aaa2a4cc9b29d4ec14bf027b312788ec2b9aed870a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"UTF-8\">
\t";
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 7
        echo "\t";
        $this->displayBlock('title', $context, $blocks);
        // line 10
        echo "\t";
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 14
        echo "</head>
<body>
\t<div class=\"wrapper\">
\t\t<div class=\"content\">
\t\t\t";
        // line 18
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "\t\t</div>
\t</div>
\t";
        // line 22
        $this->displayBlock('script', $context, $blocks);
        // line 26
        echo "</body>
</html>";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "\t";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        // line 8
        echo "\t\t<title>Хз что</title>
\t";
    }

    // line 10
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 11
        echo "\t\t<link rel=\"stylesheet\" href=\"/css/bootstrap/bootstrap.css\">
\t\t<link rel=\"stylesheet\" href=\"/css/index.css\">
\t";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "\t\t\t";
    }

    // line 22
    public function block_script($context, array $blocks = array())
    {
        // line 23
        echo "\t\t<script src=\"/js/jquery/jquery-1.11.1.js\"></script>
\t\t<script src=\"/js/bootstrap/bootstrap.js\"></script>\t\t
\t";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 23,  88 => 22,  84 => 19,  81 => 18,  75 => 11,  72 => 10,  67 => 8,  64 => 7,  60 => 6,  57 => 5,  52 => 26,  50 => 22,  46 => 20,  44 => 18,  38 => 14,  35 => 10,  32 => 7,  30 => 5,  24 => 1,);
    }
}
