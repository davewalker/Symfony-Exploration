<?php

/*
 * Copyright 2011 Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace JMS\SecurityExtraBundle\Mapping\Driver;

use Doctrine\Common\Annotations\AnnotationReader as BaseAnnotationReader;

/**
 * AnnotationReader.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class AnnotationReader extends BaseAnnotationReader
{
    public function __construct(Cache $cache = null, Parser $parser = null)
    {
        if (null === $parser) {
            $parser = new AnnotationParser();
        }

        parent::__construct($cache, $parser);

        $this->setAutoloadAnnotations(false);
        $this->setAnnotationNamespaceAlias('JMS\\SecurityExtraBundle\\Annotation\\', 'extra');
        $this->loadAnnotations();
    }

    private function loadAnnotations()
    {
        $dir = realpath(__DIR__.'/../../Annotation/').'/';
        foreach (array('AnnotationInterface', 'RunAs', 'SatisfiesParentSecurityPolicy', 'Secure', 'SecureParam', 'SecureReturn') as $annotation) {
            if (class_exists('JMS\\SecurityExtraBundle\\Annotation\\'.$annotation, false)) {
                continue;
            }

            require_once $dir.$annotation.'.php';
        }
    }
}