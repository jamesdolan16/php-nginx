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

/* about.twig */
class __TwigTemplate_b78db2d757537bca5f660ad6538ffeb2 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("base.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "    <h1>About Us</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec molestie dolor. Morbi iaculis lacus turpis, non ultricies libero aliquam eget. Maecenas non justo eros. Cras sodales luctus nisl, vel suscipit ligula scelerisque sed. Sed vel iaculis est. Quisque faucibus vel felis non porta. Maecenas lectus urna, molestie et rutrum ac, rutrum a justo. Phasellus tempus diam ut facilisis vestibulum. Quisque nibh massa, mollis quis enim ut, varius porta elit.</p>
    <p>Aenean finibus lorem quis diam sodales mollis. Vivamus et arcu blandit, dictum dolor ut, luctus risus. Nam non laoreet nisi. Integer magna felis, consectetur in consectetur quis, viverra sit amet turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus ac interdum nulla. Ut posuere imperdiet ipsum, eleifend feugiat nibh varius vitae.</p>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "about.twig";
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
        return array (  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.twig\" %}

{% block content %}
    <h1>About Us</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec molestie dolor. Morbi iaculis lacus turpis, non ultricies libero aliquam eget. Maecenas non justo eros. Cras sodales luctus nisl, vel suscipit ligula scelerisque sed. Sed vel iaculis est. Quisque faucibus vel felis non porta. Maecenas lectus urna, molestie et rutrum ac, rutrum a justo. Phasellus tempus diam ut facilisis vestibulum. Quisque nibh massa, mollis quis enim ut, varius porta elit.</p>
    <p>Aenean finibus lorem quis diam sodales mollis. Vivamus et arcu blandit, dictum dolor ut, luctus risus. Nam non laoreet nisi. Integer magna felis, consectetur in consectetur quis, viverra sit amet turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus ac interdum nulla. Ut posuere imperdiet ipsum, eleifend feugiat nibh varius vitae.</p>
{% endblock %}", "about.twig", "/var/www/html/src/templates/about.twig");
    }
}
