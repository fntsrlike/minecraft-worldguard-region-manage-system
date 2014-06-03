<?php

class RegionController extends \BaseController {

    private $array, $path, $response;


    public function __construct() {
        $this->path = './refer/regions.yml';
        $this->array = Spyc::YAMLLoad( $this->path );

        $this->response_unexist = array(
            'status' => "failed",
            'messages' => "This Region doesn't exist!"
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $array = $this->array;
        $regions = array();

        foreach ($array['regions'] as $key => $value) {
            $region = new stdClass();

            if ( stripos( $key, 'g_' ) !== false ) {
                $region->area = "Global";
                $region->name = substr( $key, 2 );
            }
            else if ( stripos( $key, 'r_' ) !== false ) {
                $region->area = "Region";
                $region->name = substr( $key, 2 );
            }
            else if ( stripos( $key, 'p_l_' ) !== false ) {
                $region->area = "Private Large";
                $region->name = substr( $key, 4 );
            }
            else if ( stripos( $key, 'p_s_' ) !== false ) {
                $region->area = "Private Small";
                $region->name = substr( $key, 4 );
            }
            else {
                $region->area = "Root";
                $region->name = $key;
            }



            $region->type = $value['type'];
            $region->min = "( {$value['min']['x']}, {$value['min']['y']}, {$value['min']['z']} )";
            $region->max = "( {$value['max']['x']}, {$value['max']['y']}, {$value['max']['z']} )";
            $region->priority = $value['priority'];
            $region->flags = '...';
            $region->owners = '...';
            $region->members = '...';

            foreach ($value['owners'] as $key_o => $value_o) {
                if ( $key_o === 'groups' ) {
                    $region->owner = "[{$value_o[0]}]";
                }
                else {
                    $region->owner = $value_o[0];
                }
                break;
            }
            foreach ($value['members'] as $key_m => $value_m) {
                if ( $key_m === 'groups' ) {
                    $region->member = "[{$value_o[0]}]";
                }
                else {
                    $region->member = $value_o[0];
                }
                break;
            }

            if ( !isset($region->owner) ) {
                $region->member = '';
            }

            if ( !isset($region->member) ) {
                $region->member = '';
            }

            $regions[] = $region;
        }

        $data['regions'] = $regions;

        return View::make('regions/index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        echo <<<_END
        <pre>
        type: cuboid
        min: {x: -400.0, y: 8.0, z: -400.0}
        max: {x: 400.0, y: 230.0, z: 400.0}
        priority: 0
        flags:
        owners:
            groups: [...]
        members:
            groups: [...]

        </pre>
_END;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $array = array();

        $array['min']['x'] = Input::get('min_x');
        $array['min']['y'] = 1;
        $array['min']['z'] = Input::get('min_z');
        $array['max']['x'] = Input::get('max_x');
        $array['max']['y'] = 255;
        $array['max']['z'] = Input::get('max_z');
        $array['priority'] = Input::get('priority');
        $array['owners']['players']  = Input::get('owners_players');
        $array['owners']['groups']   = Input::get('owners_groups');
        $array['members']['players'] = Input::get('members_players');
        $array['members']['groups']  = Input::get('members_groups');
        $array['flags'] = json_decode( Input::get('flags') );

        $name = Input::get('name');

        $this->array[$name] = $array;
        $yaml = Spyc::YAMLDump($array,4,60);

        file_put_contents($this->path, $yaml);

        return Response::json(array('status' => 'success'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if ( !array_key_exists($id, $this->array['regions'] ) ) {
            return Response::json( $this->response_unexist );
        }

        $array = $this->array;

        return Response::json($array['regions'][$id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if ( !array_key_exists($id, $this->array['regions'] ) ) {
            return Response::json( $this->response_unexist );
        }

        $array = $this->array;

        return Response::json($array['regions'][$id]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if ( !array_key_exists($id, $this->array['regions'] ) ) {
            return Response::json( $this->response_unexist );
        }

        $array = array();

        $array['min']['x'] = Input::get('min_x');
        $array['min']['y'] = 1;
        $array['min']['z'] = Input::get('min_z');
        $array['max']['x'] = Input::get('max_x');
        $array['max']['y'] = 255;
        $array['max']['z'] = Input::get('max_z');
        $array['priority'] = Input::get('priority');
        $array['owners']['players']  = Input::get('owners_players');
        $array['owners']['groups']   = Input::get('owners_groups');
        $array['members']['players'] = Input::get('members_players');
        $array['members']['groups']  = Input::get('members_groups');
        $array['flags'] = json_decode( Input::get('flags') );

        $name = $id;

        $this->array[$name] = $array;
        $yaml = Spyc::YAMLDump($array,4,60);

        file_put_contents($this->path, $yaml);

        return Response::json(array('status' => 'success'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return response
     */
    public function destroy($id)
    {
        if ( !array_key_exists($id, $this->array['regions'] ) ) {
            return Response::json( $this->response_unexist );
        }

        $array = $this->array;
        unset( $array['regions'][$id] );

        $yaml = Spyc::YAMLDump($array,4,60);
        file_put_contents($this->path, $yaml);

        echo $yaml;

        $this->array = $array;

        return Response::json(array('status' => 'success'));
    }
}
