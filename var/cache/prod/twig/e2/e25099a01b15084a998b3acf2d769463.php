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
class __TwigTemplate_74520a79737811af37ba9f0a86ff6455 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "media_list/add_mediaList.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "<span style=\"font-size:.75em\">";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "type", [], "any", false, false, false, 3) == 0)) ? ("Playlist ") : ("Chaîne "));
        yield "</span>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "title", [], "any", false, false, false, 3), "html", null, true);
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "
    ";
        // line 7
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["mediaList"] ?? null))) {
            // line 8
            yield "        <h3>Caractéristiques :</h3>
        <ul>
            <li>Url : ";
            // line 10
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "url", [], "any", false, false, false, 10), "html", null, true);
            yield "</li>
            <li>Contient X vidéos</li>
            <li>X vidéos ont été téléchargées</li>
        </ul>
        <h3>Réglages :</h3>
        <ul>
            <li>Téléchargement des ";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "xLastVideos", [], "any", false, false, false, 16), "html", null, true);
            yield " dernières vidéos</li>
            <li>Supprimer les vidéos téléchargées après ";
            // line 17
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "deleteAfter", [], "any", false, false, false, 17) > 0)) ? ((((CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "deleteAfter", [], "any", false, false, false, 17) > 1)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "deleteAfter", [], "any", false, false, false, 17) . " jours"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "deleteAfter", [], "any", false, false, false, 17) . " jour"), "html", null, true)))) : (" jamais"));
            yield "</li>
            <li>Cronjob : ";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "cronjob", [], "any", false, false, false, 18), "html", null, true);
            yield "</li>
            <li>Qualité : ";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "quality", [], "any", false, false, false, 19), "html", null, true);
            yield "</li>
            <li>Chemin de téléchargement : ";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["mediaList"] ?? null), "path", [], "any", false, false, false, 20), "html", null, true);
            yield "</li>
        </ul>
        <a href=\"#\" class=\"button edit-button\">Modifier</a><a href=\"#\" class=\"button arch-button\">Archiver</a><a href=\"#\" class=\"button del-button\">Supprimer</a>


    ";
        } else {
            // line 26
            yield "        <p>Vide</p>
    ";
        }
        // line 28
        yield "
";
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
        return array (  120 => 28,  116 => 26,  107 => 20,  103 => 19,  99 => 18,  95 => 17,  91 => 16,  82 => 10,  78 => 8,  76 => 7,  73 => 6,  66 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "media_list/add_mediaList.html.twig", "/home/florian/PhpstormProjects/Dorizonerr/app/templates/media_list/add_mediaList.html.twig");
    }
}
