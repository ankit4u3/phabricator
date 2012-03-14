<?php

/*
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

final class PhabricatorChangesetResponse extends AphrontProxyResponse {

  private $renderedChangeset;
  private $coverage;

  public function setRenderedChangeset($rendered_changeset) {
    $this->renderedChangeset = $rendered_changeset;
    return $this;
  }

  public function setCoverage($coverage) {
    $this->coverage = $coverage;
    return $this;
  }

  protected function buildProxy() {
    return new AphrontAjaxResponse();
  }

  public function buildResponseString() {
    $content = array(
      'changeset' => $this->renderedChangeset,
    );

    if ($this->coverage) {
      $content['coverage'] = $this->coverage;
    }

    return $this->getProxy()->setContent($content)->buildResponseString();
  }

}