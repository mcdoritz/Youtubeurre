<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* media_list/add_mediaList.html.twig */
class __TwigTemplate_d7673baaa7942f6d3fc7dd6da8713c38 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "media_list/add_mediaList.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "media_list/add_mediaList.html.twig"));

        // line 3
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 3, $this->source); })()), "archived", [], "any", false, false, false, 3) == true)) {
            // line 4
            $context["title"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 5
                yield "        <span style=\"font-size:.75em\">";
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 5, $this->source); })()), "type", [], "any", false, false, false, 5) == 0)) ? ("Playlist ") : ("Chaîne "));
                yield " archivée</span>
        ";
                // line 6
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 6, $this->source); })()), "title", [], "any", false, false, false, 6), "html", null, true);
                yield "
    ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
        } else {
            // line 9
            $context["title"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 10
                yield "        <span style=\"font-size:.75em\">";
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 10, $this->source); })()), "type", [], "any", false, false, false, 10) == 0)) ? ("Playlist ") : ("Chaîne "));
                yield " active</span>
        ";
                // line 11
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 11, $this->source); })()), "title", [], "any", false, false, false, 11), "html", null, true);
                yield "
    ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
        }
        // line 15
        $context["page_title"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 15, $this->source); })()), "title", [], "any", false, false, false, 15), "html", null, true);
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "media_list/add_mediaList.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 16
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 16, $this->source); })()), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 19
        yield "
    <h2>";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 20, $this->source); })()), "html", null, true);
        yield "</h2>

    ";
        // line 22
        if ( !Twig\Extension\CoreExtension::testEmpty((isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 22, $this->source); })()))) {
            // line 23
            yield "
        <h3>Caractéristiques :</h3>
        <ul class=\"carac-sett-list\">
            <li>Url : <a href=\"";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 26, $this->source); })()), "url", [], "any", false, false, false, 26), "html", null, true);
            yield "\" target=\"_blank\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 26, $this->source); })()), "url", [], "any", false, false, false, 26), "html", null, true);
            yield "</a>&#8599;</li>
            <li>Contient X vidéos</li>
            <li>X vidéos ont été téléchargées</li>
        </ul>
        <h3>Réglages :</h3>
        <ul class=\"carac-sett-list\">
            <li>Téléchargement des ";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 32, $this->source); })()), "xLastVideos", [], "any", false, false, false, 32), "html", null, true);
            yield " dernières vidéos</li>
            <li>
                ";
            // line 34
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 34, $this->source); })()), "deleteAfter", [], "any", false, false, false, 34) > 0)) ? ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 34, $this->source); })()), "deleteAfter", [], "any", false, false, false, 34) > 1)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((("Supprimer les vidéos téléchargées après " . CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 34, $this->source); })()), "deleteAfter", [], "any", false, false, false, 34)) . " jours"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((("Supprimer les vidéos téléchargées après " . CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 34, $this->source); })()), "deleteAfter", [], "any", false, false, false, 34)) . " jour"), "html", null, true)))) : ("Les vidéos ne sont jamais supprimées"));
            yield "
            </li>
            <li>Cronjob : ";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 36, $this->source); })()), "cronjob", [], "any", false, false, false, 36), "html", null, true);
            yield "</li>
            <li>Qualité : ";
            // line 37
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 37, $this->source); })()), "quality", [], "any", false, false, false, 37) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 37, $this->source); })()), "quality", [], "any", false, false, false, 37) . "/3"), "html", null, true)) : ("Audio seulement"));
            yield "</li>
            <li>Chemin de téléchargement : ";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 38, $this->source); })()), "path", [], "any", false, false, false, 38), "html", null, true);
            yield "</li>
        </ul>
        <p>
            <a href=\"#\" class=\"button edit-button\">Modifier</a><a href=\"#\" class=\"button arch-button\">Archiver</a><a href=\"#\" class=\"button del-button\">Supprimer</a>
        </p>
        <p style=\"margin-top:4em\">
            <a href=\"";
            // line 44
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 44, $this->source); })()), "archived", [], "any", false, false, false, 44) == "true")) ? ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("index.archived")) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("index")));
            yield "\" class=\"button add-button\">Revenir ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 44, $this->source); })()), "archived", [], "any", false, false, false, 44) == "true")) ? ("aux archives") : ("à l'index"));
            yield "</a>
        </p>

    ";
        } else {
            // line 48
            yield "        <p>Vide</p>
    ";
        }
        // line 50
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "media_list/add_mediaList.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  204 => 50,  200 => 48,  191 => 44,  182 => 38,  178 => 37,  174 => 36,  169 => 34,  164 => 32,  153 => 26,  148 => 23,  146 => 22,  141 => 20,  138 => 19,  125 => 18,  101 => 16,  90 => 1,  84 => 15,  77 => 11,  72 => 10,  70 => 9,  63 => 6,  58 => 5,  56 => 4,  54 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% if mediaList.archived == true %}
    {% set title %}
        <span style=\"font-size:.75em\">{{ mediaList.type == 0 ? 'Playlist ' : 'Chaîne ' }} archivée</span>
        {{ mediaList.title }}
    {% endset %}
{% else %}
    {% set title %}
        <span style=\"font-size:.75em\">{{ mediaList.type == 0 ? 'Playlist ' : 'Chaîne ' }} active</span>
        {{ mediaList.title }}
    {% endset %}
{% endif %}

{% set page_title %} {{ mediaList.title }}{% endset %}
{% block title %} {{ title }}{% endblock %}

{% block body %}

    <h2>{{ title }}</h2>

    {% if mediaList is not empty %}

        <h3>Caractéristiques :</h3>
        <ul class=\"carac-sett-list\">
            <li>Url : <a href=\"{{ mediaList.url }}\" target=\"_blank\">{{ mediaList.url }}</a>&#8599;</li>
            <li>Contient X vidéos</li>
            <li>X vidéos ont été téléchargées</li>
        </ul>
        <h3>Réglages :</h3>
        <ul class=\"carac-sett-list\">
            <li>Téléchargement des {{ mediaList.xLastVideos }} dernières vidéos</li>
            <li>
                {{ mediaList.deleteAfter > 0 ? mediaList.deleteAfter > 1 ? 'Supprimer les vidéos téléchargées après ' ~ mediaList.deleteAfter ~ ' jours' : 'Supprimer les vidéos téléchargées après ' ~ mediaList.deleteAfter ~ ' jour' : 'Les vidéos ne sont jamais supprimées' }}
            </li>
            <li>Cronjob : {{ mediaList.cronjob }}</li>
            <li>Qualité : {{ mediaList.quality > 0 ? mediaList.quality ~ '/3' : 'Audio seulement' }}</li>
            <li>Chemin de téléchargement : {{ mediaList.path }}</li>
        </ul>
        <p>
            <a href=\"#\" class=\"button edit-button\">Modifier</a><a href=\"#\" class=\"button arch-button\">Archiver</a><a href=\"#\" class=\"button del-button\">Supprimer</a>
        </p>
        <p style=\"margin-top:4em\">
            <a href=\"{{  mediaList.archived == 'true' ? path('index.archived') : path('index') }}\" class=\"button add-button\">Revenir {{ mediaList.archived == 'true' ? 'aux archives' : 'à l\\'index' }}</a>
        </p>

    {% else %}
        <p>Vide</p>
    {% endif %}

{% endblock %}
", "media_list/add_mediaList.html.twig", "/home/florian/PhpstormProjects/Dorizonerr/app/templates/media_list/add_mediaList.html.twig");
    }
}
