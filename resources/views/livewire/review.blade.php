<div>
    <div class="container mt-4">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'details' ? 'active' : '' }}" wire:click="changeTab('details')">Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'reviews' ? 'active' : '' }}" wire:click="changeTab('reviews')">Reviews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'qa' ? 'active' : '' }}" wire:click="changeTab('qa')">Q&A</a>
            </li>
        </ul>
        <div class="tab-content mt-3">
            @if($activeTab === 'details')
                <div id="details">
                    <h3>Details</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias assumenda dicta distinctio dolores doloribus quae quaerat. Corporis
                        distinctio dolore, dolores dolorum error expedita harum iusto, maxime molestias quo rem rerum. Assumenda beatae blanditiis distinctio,
                        esse
                        et eveniet inventore magnam nihil quam vel. Fuga nemo nihil possimus sunt ullam. Dolorum eveniet ex impedit maxime mollitia nulla
                        perspiciatis quos recusandae, totam ullam? Aperiam dolorem, harum illo ipsa iure iusto nam nostrum, possimus quas rem ut veniam?
                        Consequuntur dolor facere illo itaque non possimus rerum. At atque consequuntur deleniti error eum excepturi neque, nulla omnis, quae,
                        quaerat quasi quia quo reiciendis suscipit veniam.</p>
                </div>
            @endif

            @if($activeTab === 'reviews')
                <div id="reviews">
                    <h3>Reviews</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto assumenda atque aut autem culpa cupiditate distinctio dolores ea
                        earum eligendi eos esse expedita fugit id illo illum ipsum iste itaque minima natus nesciunt nulla perferendis porro quaerat quas quasi
                        quod
                        quos ratione, repellat sit soluta suscipit unde ut voluptatem, voluptates voluptatum. Et nihil perspiciatis porro veniam voluptatum.
                        Assumenda consequatur deleniti distinctio ducimus ipsum modi perspiciatis, placeat quae quam, sunt suscipit tempora, vero vitae?
                        Assumenda
                        beatae consequuntur culpa dolor eaque eum facere fugiat hic laboriosam magnam natus obcaecati quam quidem, ratione recusandae sapiente
                        sunt
                        veniam vitae! Adipisci alias ipsum libero.</p>
                </div>
            @endif

            @if($activeTab === 'qa')
                <div id="qa">
                    <h3>Q&A</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut beatae consequuntur cum earum eos in ipsam, labore laborum libero,
                        maiores
                        molestiae quo reprehenderit, ut velit. Aliquam assumenda aut delectus distinctio doloribus ea earum excepturi exercitationem harum illo
                        inventore ipsum iste maiores maxime nam nemo, obcaecati odio officia pariatur quam reiciendis sint sunt ut veniam voluptatem. Ab ad
                        adipisci
                        aperiam architecto asperiores corporis eaque eos facilis, iure molestiae molestias natus non odit, recusandae sapiente ullam voluptatum!
                        Aliquid, at eveniet fugit impedit labore omnis tempore. Blanditiis explicabo maxime numquam quaerat, quibusdam voluptas? Accusantium hic
                        laborum maxime nisi nulla perspiciatis quam soluta!</p>
                </div>
            @endif
        </div>
    </div>
</div>
