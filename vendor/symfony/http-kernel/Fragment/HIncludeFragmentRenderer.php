<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Fragment;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
<<<<<<< HEAD
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpKernel\UriSigner;
use Twig\Environment;
=======
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpKernel\UriSigner;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Implements the Hinclude rendering strategy.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class HIncludeFragmentRenderer extends RoutableFragmentRenderer
{
    private $globalDefaultTemplate;
    private $signer;
<<<<<<< HEAD
    private $twig;
    private $charset;

    /**
     * @param string $globalDefaultTemplate The global default content (it can be a template name or the content)
     */
    public function __construct(Environment $twig = null, UriSigner $signer = null, string $globalDefaultTemplate = null, string $charset = 'utf-8')
    {
        $this->twig = $twig;
=======
    private $templating;
    private $charset;

    /**
     * Constructor.
     *
     * @param EngineInterface|\Twig_Environment $templating            An EngineInterface or a \Twig_Environment instance
     * @param UriSigner                         $signer                A UriSigner instance
     * @param string                            $globalDefaultTemplate The global default content (it can be a template name or the content)
     * @param string                            $charset
     */
    public function __construct($templating = null, UriSigner $signer = null, $globalDefaultTemplate = null, $charset = 'utf-8')
    {
        $this->setTemplating($templating);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->globalDefaultTemplate = $globalDefaultTemplate;
        $this->signer = $signer;
        $this->charset = $charset;
    }

    /**
<<<<<<< HEAD
     * Checks if a templating engine has been set.
     *
     * @return bool
     */
    public function hasTemplating()
    {
        return null !== $this->twig;
=======
     * Sets the templating engine to use to render the default content.
     *
     * @param EngineInterface|\Twig_Environment|null $templating An EngineInterface or a \Twig_Environment instance
     *
     * @throws \InvalidArgumentException
     */
    public function setTemplating($templating)
    {
        if (null !== $templating && !$templating instanceof EngineInterface && !$templating instanceof \Twig_Environment) {
            throw new \InvalidArgumentException('The hinclude rendering strategy needs an instance of \Twig_Environment or Symfony\Component\Templating\EngineInterface');
        }

        $this->templating = $templating;
    }

    /**
     * Checks if a templating engine has been set.
     *
     * @return bool true if the templating engine has been set, false otherwise
     */
    public function hasTemplating()
    {
        return null !== $this->templating;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     *
     * Additional available options:
     *
     *  * default:    The default content (it can be a template name or the content)
     *  * id:         An optional hx:include tag id attribute
     *  * attributes: An optional array of hx:include tag attributes
     */
<<<<<<< HEAD
    public function render($uri, Request $request, array $options = [])
    {
        if ($uri instanceof ControllerReference) {
            $uri = (new FragmentUriGenerator($this->fragmentPath, $this->signer))->generate($uri, $request);
=======
    public function render($uri, Request $request, array $options = array())
    {
        if ($uri instanceof ControllerReference) {
            if (null === $this->signer) {
                throw new \LogicException('You must use a proper URI when using the Hinclude rendering strategy or set a URL signer.');
            }

            // we need to sign the absolute URI, but want to return the path only.
            $uri = substr($this->signer->sign($this->generateFragmentUri($uri, $request, true)), strlen($request->getSchemeAndHttpHost()));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        // We need to replace ampersands in the URI with the encoded form in order to return valid html/xml content.
        $uri = str_replace('&', '&amp;', $uri);

<<<<<<< HEAD
        $template = $options['default'] ?? $this->globalDefaultTemplate;
        if (null !== $this->twig && $template && $this->twig->getLoader()->exists($template)) {
            $content = $this->twig->render($template);
=======
        $template = isset($options['default']) ? $options['default'] : $this->globalDefaultTemplate;
        if (null !== $this->templating && $template && $this->templateExists($template)) {
            $content = $this->templating->render($template);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        } else {
            $content = $template;
        }

<<<<<<< HEAD
        $attributes = isset($options['attributes']) && \is_array($options['attributes']) ? $options['attributes'] : [];
=======
        $attributes = isset($options['attributes']) && is_array($options['attributes']) ? $options['attributes'] : array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (isset($options['id']) && $options['id']) {
            $attributes['id'] = $options['id'];
        }
        $renderedAttributes = '';
<<<<<<< HEAD
        if (\count($attributes) > 0) {
            $flags = \ENT_QUOTES | \ENT_SUBSTITUTE;
=======
        if (count($attributes) > 0) {
            $flags = ENT_QUOTES | ENT_SUBSTITUTE;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            foreach ($attributes as $attribute => $value) {
                $renderedAttributes .= sprintf(
                    ' %s="%s"',
                    htmlspecialchars($attribute, $flags, $this->charset, false),
                    htmlspecialchars($value, $flags, $this->charset, false)
                );
            }
        }

        return new Response(sprintf('<hx:include src="%s"%s>%s</hx:include>', $uri, $renderedAttributes, $content));
    }

    /**
<<<<<<< HEAD
=======
     * @param string $template
     *
     * @return bool
     */
    private function templateExists($template)
    {
        if ($this->templating instanceof EngineInterface) {
            try {
                return $this->templating->exists($template);
            } catch (\InvalidArgumentException $e) {
                return false;
            }
        }

        $loader = $this->templating->getLoader();
        if ($loader instanceof \Twig_ExistsLoaderInterface) {
            return $loader->exists($template);
        }

        try {
            $loader->getSource($template);

            return true;
        } catch (\Twig_Error_Loader $e) {
        }

        return false;
    }

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'hinclude';
    }
}
